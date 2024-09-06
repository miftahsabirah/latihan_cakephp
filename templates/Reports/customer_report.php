<h1>Report Customer</h1>

<?= $this->Form->create(null, ['type' => 'get']) ?>
    <?= $this->Form->control('start_date', [
        'label' => 'Start Date', 
        'type' => 'date', 
        'value' => $startDate ?? null
    ]) ?>
    <?= $this->Form->control('end_date', [
        'label' => 'End Date', 
        'type' => 'date', 
        'value' => $endDate ?? null
    ]) ?>
    <?= $this->Form->button('Submit') ?>
<?= $this->Form->end() ?>

<table>
    <thead>
        <tr>
            <th>Date</th>
            <th>Name</th>
            <th>Address</th>
            <th>Motor Purchase</th>
            <th>Purchase Price</th>
            <th>Motor Sale</th>
            <th>Sale Price</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($customers as $customer): ?>
            <?php foreach ($customer->purchases as $purchase): ?>
            <tr>
                <td><?= h($purchase->date) ?></td>
                <td><?= h($customer->name) ?></td>
                <td><?= h($customer->address) ?></td>
                <td><?= h($purchase->motor_name) ?></td>
                <td><?= h($purchase->price) ?></td>
                <?php if (!empty($customer->sales)): ?>
                    <td><?= h($customer->sales[0]->motor_name) ?></td>
                    <td><?= h($customer->sales[0]->price) ?></td>
                <?php else: ?>
                    <td>-</td>
                    <td>-</td>
                <?php endif; ?>
            </tr>
            <?php endforeach; ?>
        <?php endforeach; ?>
    </tbody>
</table>
