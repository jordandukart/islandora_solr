<?php

namespace Drupal\islandora_solr\Plugin\Block;

use Drupal\Core\Block\BlockBase;

use Drupal\islandora_solr\IslandoraSolrResults;

/**
 * Provides a faceting block.
 *
 * @Block(
 *   id = "islandora_solr_basic_facets",
 *   admin_label = @Translation("Islandora facets"),
 * )
 */
class Facets extends BlockBase {

  /**
   * {@inheritdoc}
   */
  public function build() {
    global $_islandora_solr_queryclass;
    if (!islandora_solr_results_page($_islandora_solr_queryclass)) {
      return;
    }
    $results = new IslandoraSolrResults();
    $output = $results->displayFacets($_islandora_solr_queryclass);
    if ($output) {
      return ['#markup' => $output];
    }
  }

}
