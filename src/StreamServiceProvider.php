<?php namespace EvolutionCMS\Stream;

use EvolutionCMS\Models\SiteContent;
use EvolutionCMS\Models\WebUser;
use EvolutionCMS\ServiceProvider;
use EvolutionCMS\Stream\Models\Comments;

class StreamServiceProvider extends ServiceProvider
{
    /**
     * Если указать пустую строку, то сниппеты и чанки будут иметь привычное нам именование
     * Допустим, файл test создаст чанк/сниппет с именем test
     * Если же указан namespace то файл test создаст чанк/сниппет с именем stream#test
     * При этом поддерживаются файлы в подпапках. Т.е. файл test из папки subdir создаст элемент с именем subdir/test
     */
    protected $namespace = 'stream';

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {

        SiteContent::addDynamicRelation('comments', function (SiteContent $myModel) {
            return $myModel->hasMany(Comments::class);
        });

        $this->app->registerModule(
            'Комменатрии',
            dirname(__DIR__) . '/modules/module.php'
        );
    }
}