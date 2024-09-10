<?php
declare(strict_types=1);

namespace App\Model\Behavior;

use Cake\ORM\Behavior;
use Cake\ORM\Table;
use Cake\Event\EventInterface;
use Cake\Utility\Text;


/**
 * SluggableBehavior behavior
 */
class SluggableBehaviorBehavior extends Behavior
{
    /**
     * Default configuration.
     *
     * @var array<string, mixed>
     */
    protected $_defaultConfig = [
        'field' => 'title',
        'slug' => 'slug',
        'replacement' => '-',
        'lowercase' => true,
        'transliterate' => true,
    ];

    public function beforeSave(EventInterface $event, $entity, $options)
    {
        $config = $this->getConfig();
        $field = $config['field'];
        $slug = $config['slug'];

        if ($entity->isNew() || $entity->isDirty($field)) {
            $slugValue = $entity->get($field);
            $entity->set($slug, $this->generateSlug($slugValue));
        }
    }

    protected function generateSlug($value)
    {
        $config = $this->getConfig();
        $slug = Text::slug($value, [
            'replacement' => $config['replacement'],
            'transliterate' => $config['transliterate'],
        ]);

        if ($config['lowercase']) {
            $slug = strtolower($slug);
        }

        return $slug;
    }    
}
