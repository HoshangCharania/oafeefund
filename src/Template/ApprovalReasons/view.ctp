<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ApprovalReason $approvalReason
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Approval Reason'), ['action' => 'edit', $approvalReason->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Approval Reason'), ['action' => 'delete', $approvalReason->id], ['confirm' => __('Are you sure you want to delete # {0}?', $approvalReason->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Approval Reasons'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Approval Reason'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="approvalReasons view large-9 medium-8 columns content">
    <h3><?= h($approvalReason->approval_reason).":" ?></h3>
    <div class="row">
        <h4><?= __('Approval Email') ?></h4>
        <?= $approvalReason->approval_email ?>
    </div>
</div>
