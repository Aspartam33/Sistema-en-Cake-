<h1>Sistema de enlaces delicake</h1>
<h2>Bienvenido Sr/Sra: <?=$this->Html->link($current_user [ 'first_name'].''.$current_user['apellido'],
['controller'=>'Usuarios','action'=>'view',$current_user [ 'id']]);?></h2>