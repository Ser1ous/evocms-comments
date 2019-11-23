<?php
use EvolutionCMS\DemoChat\Models\Comments;

$data['site_content_id'] = EvolutionCMS()->documentIdentifier;
Comments::create($_POST);