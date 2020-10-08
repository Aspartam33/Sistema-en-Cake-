<div class="row">
    <div class="col-md-12">
    	<div class="page-header">
    		<h2>Contacto</h2>
    	</div>
    	<div class="table-responsive">
    		<table class="table table-striped table-hover">
    		<thead>
    		<tr>
                <th><?= $this->Paginator->sort('id') ?></th>
                <th><?= $this->Paginator->sort('first_name', ['Nombre']) ?></th>
                <th><?= $this->Paginator->sort('last_name', ['Apellidos']) ?></th>
                <th><?= $this->Paginator->sort('email', ['Correo electrónico']) ?></th>
                <th>Acciones</th>
    		</tr>
    		</thead>
    		<tbody>
    		<?php foreach ($contacts as $contact): ?>
    		<tr>
                <td><?= $this->Number->format($contact->id) ?></td>
                <td><?= h($contact->first_name) ?></td>
                <td><?= h($contact->last_name) ?></td>
                <td><?= h($contact->email) ?></td>
                <td>
                    <?= $this->Html->link('Ver', ['action' => 'view', $contact->id], ['class' => 'btn btn-sm btn-info']) ?>
                    
                    <?= $this->Form->postLink('Eliminar', ['action' => 'delete', $contact->id], ['confirm' => 'Eliminar usuario ?', 'class' => 'btn btn-sm btn-danger']) ?>
                </td>
    		</tr>
    	<?php endforeach; ?>
    		</tbody>
    		</table>
    	</div>