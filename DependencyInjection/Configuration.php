<?
namespace Seyon\PHPBB3\UserBundle\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

class Configuration implements ConfigurationInterface
{
    public function getConfigTreeBuilder()
    {
        $treeBuilder = new TreeBuilder();
        $rootNode = $treeBuilder->root('seyon_phpbb3_admin');

        $rootNode
            ->children()
                ->scalarNode('table_prefix') 
                    ->defaultValue('phpbb3_')
                ->end()
            ->end();

        return $treeBuilder;
    }
}