<?php
/**
 * Created by Luis Cordova <cordoval@gmail.com>.
 * User: cordoval
 * Date: 6/15/11
 * Time: 12:27 AM
 *
 */

namespace Bundle\ExerciseCom\CountryBundle\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\NodeBuilder;
use Symfony\Component\Config\Definition\Builder\TreeBuilder;

/**
 * This class contains the configuration information for the bundle
 *
 * This information is solely responsible for how the different configuration
 * sections are normalized, and merged.
 */
class Configuration
{
    /**
     * Generates the configuration tree.
     *
     * @return NodeInterface
     */
    public function getConfigTree()
    {
        $treeBuilder = new TreeBuilder();

        $treeBuilder->root('cordova_country', 'array')
            ->children()
                ->scalarNode('db_driver')->cannotBeOverwritten()->isRequired()->end()
            ->end()
        ->end();

        return $treeBuilder->buildTree();
    }
}