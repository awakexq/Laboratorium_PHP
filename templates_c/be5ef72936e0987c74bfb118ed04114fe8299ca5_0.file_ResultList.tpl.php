<?php
/* Smarty version 5.4.2, created on 2025-04-28 21:35:58
  from 'file:ResultList.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.4.2',
  'unifunc' => 'content_680ff4be88aa21_71188383',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'be5ef72936e0987c74bfb118ed04114fe8299ca5' => 
    array (
      0 => 'ResultList.tpl',
      1 => 1745875894,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
))) {
function content_680ff4be88aa21_71188383 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = '/Applications/MAMP/htdocs/php_07_routing_test/app/views';
$_smarty_tpl->getInheritance()->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_551090931680ff4be8767c8_81240523', 'lista_wynikow');
$_smarty_tpl->getInheritance()->endChild($_smarty_tpl, "main.tpl", $_smarty_current_dir);
}
/* {block 'lista_wynikow'} */
class Block_551090931680ff4be8767c8_81240523 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = '/Applications/MAMP/htdocs/php_07_routing_test/app/views';
?>

<div class="pure-g">
    <div class="l-box-lrg pure-u-1">
        <table id="tab_wyniki" class="pure-table pure-table-bordered" style="width: 100%; margin-top: 20px;">
            <thead>
                <tr>
                    <th>Kwota</th>
                    <th>Liczba lat</th>
                    <th>Procent</th>
                    <th>Rata</th>
                    <th>Data</th>
                </tr>
            </thead>
            <tbody>
                <?php
$_from = $_smarty_tpl->getSmarty()->getRuntime('Foreach')->init($_smarty_tpl, $_smarty_tpl->getValue('wyniki'), 'w');
$foreach0DoElse = true;
foreach ($_from ?? [] as $_smarty_tpl->getVariable('w')->value) {
$foreach0DoElse = false;
?>
                <tr><td><?php echo $_smarty_tpl->getValue('w')["kwota"];?>
</td><td><?php echo $_smarty_tpl->getValue('w')["lat"];?>
</td><td><?php echo $_smarty_tpl->getValue('w')["procent"];?>
</td><td><?php echo $_smarty_tpl->getValue('w')["rata"];?>
</td><td><?php echo $_smarty_tpl->getValue('w')["data"];?>
</td></tr>
                <?php
}
$_smarty_tpl->getSmarty()->getRuntime('Foreach')->restore($_smarty_tpl, 1);?>
            </tbody>
        </table>
    </div>
</div>
<?php
}
}
/* {/block 'lista_wynikow'} */
}
