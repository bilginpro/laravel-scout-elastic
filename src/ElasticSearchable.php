<?php

namespace ScoutEngines\Elasticsearch;

use Laravel\Scout\Builder as ScoutBuilder;
use Laravel\Scout\Searchable;

trait ElasticSearchable
{

    use Searchable;

    public $elasticQuery;

    /**
     * Use the first defined index in config
     *
     * @return string
     */
    public function searchableWithin()
    {
        return current(array_keys(config('elasticsearch.indices')));
    }

    /**
     * Search; Elasticsearch style
     *
     * @param array $params
     * @return ScoutBuilder
     */
    public static function elasticSearch(array $params = null)
    {
        $model = new static;

        $model->elasticQuery = [
            'params' => $params
        ];

        return new ScoutBuilder($model, null);
    }

}
