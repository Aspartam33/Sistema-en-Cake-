<h2>edita tu enlace</h2>
<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User $user
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        
    </ul>
</nav>
<div class="users form large-9 medium-8 columns content">
    <?= $this->Form->create($bookmark,['novalidate']); ?>
    <fieldset>
        <legend><?= __('Editar') ?></legend>
        
            <?=$this->element('Bookmarks/field')?>
        
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>