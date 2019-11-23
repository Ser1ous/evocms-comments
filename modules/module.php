<?php
$filesystem = new Illuminate\Filesystem\Filesystem;
$viewFinder = new Illuminate\View\FileViewFinder($filesystem, [EVO_CORE_PATH . 'vendor/ser1ous/evocms-comments/modules/view/']);
\Illuminate\Support\Facades\View::setFinder($viewFinder);

$action = '';
if (isset($_GET['action']))
    $action = $_GET['action'];

switch ($action) {
    case 'saveComments':
        if ($_POST['webix_operation'] == 'delete') return '';
        //$comment = \EvolutionCMS\DemoChat\Models\Comments::find($_POST['id'])->update($_POST);
        $comment = \EvolutionCMS\DemoChat\Models\Comments::find($_POST['id']);
        $comment->published = $_POST['published'];
        $comment->name = $_POST['name'];
        $comment->message = $_POST['message'];
        $comment->save();
        break;
    case 'deletedComment':
        echo \Illuminate\Support\Facades\View::make('deletedcommentlist');
        break;
    case 'deleteComment':
        \EvolutionCMS\DemoChat\Models\Comments::find($_GET['comment_id'])->delete();
        break;
    case 'destroyComment':
        \EvolutionCMS\DemoChat\Models\Comments::withTrashed()->find($_GET['comment_id'])->forceDelete();
        break;
    case 'restoreComment':
        \EvolutionCMS\DemoChat\Models\Comments::withTrashed()->find($_GET['comment_id'])->restore();
        exit();
        break;
    case 'returnAllComments':
        header('Content-Type: application/json');
        echo \EvolutionCMS\DemoChat\Models\Comments::all()->toJson();
        break;
    case 'returnDeletedComments':
        header('Content-Type: application/json');
        echo \EvolutionCMS\DemoChat\Models\Comments::onlyTrashed()->get()->toJson();
        break;
    default:
        echo \Illuminate\Support\Facades\View::make('commentlist');
        break;
}
