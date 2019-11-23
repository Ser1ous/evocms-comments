<?php
use EvolutionCMS\Stream\Models\Comments;

$data['site_content_id'] = EvolutionCMS()->documentIdentifier;
Comments::create($_POST);