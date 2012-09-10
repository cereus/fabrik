<div class="tab-pane" id="data">

	<ul class="nav nav-tabs">
		<li class="active">
	    	<a data-toggle="tab" href="#data-data">
	    		<?php echo JText::_('COM_FABRIK_DATA'); ?>
	    	</a>
	    </li>
	    <li>
	    	<a data-toggle="tab" href="#data-groupby">
	    		<?php echo JText::_('COM_FABRIK_GROUP_BY')?>
	    	</a>
	    </li>
	    <li>
	    	<a data-toggle="tab" href="#data-prefilter">
	    		<?php echo JText::_('COM_FABRIK_PREFILTER')?>
	    	</a>
	    </li>
	    <li>
	    	<a data-toggle="tab" href="#data-joins">
	    		<?php echo JText::_('COM_FABRIK_JOINS')?>
	    	</a>
	    </li>
	    <li>
	    	<a data-toggle="tab" href="#data-faceted">
	    		<?php echo JText::_('COM_FABRIK_RELATED_DATA')?>
	    	</a>
	    </li>
	</ul>

	<div class="tab-content">
		<div class="tab-pane active" id="data-data">
			<fieldset class="form-horizontal">
			<?php
			$this->field = $this->form->getField('connection_id');
			echo $this->loadTemplate('control_group');
			if ($this->item->id == 0) :
				$this->field = $this->form->getField('_database_name');
				echo $this->loadTemplate('control_group');
				echo $this->form->getLabel('or');
			endif;
			$this->field = $this->form->getField('db_table_name');
			echo $this->loadTemplate('control_group');
			$this->field = $this->form->getField('db_primary_key');
			echo $this->loadTemplate('control_group');
			$this->field = $this->form->getField('auto_inc');
			echo $this->loadTemplate('control_group');
			 ?>

			<label for="order_by"><?php echo JText::_('COM_FABRIK_FIELD_ORDER_BY_LABEL'); ?></label>
			<div id="orderByTd" style="float:left;margin:4px 0 0 2px">
			<?php
			for ($o = 0; $o < count($this->order_by); $o++) : ?>
			<div class="orderby_container" style="margin-bottom:3px">
			<?php
				echo JArrayHelper::getValue($this->order_by, $o, $this->order_by[0]);
				if ((int) $this->item->id !== 0) :
					echo JArrayHelper::getValue($this->order_dir, $o)?>
					<a class="addOrder" href="#"><img src="components/com_fabrik/images/plus-sign.png" label="<?php echo JText::_('COM_FABRIK_ADD')?>" alt="<?php echo JText::_('COM_FABRIK_ADD')?>" /></a>
					<a class="deleteOrder" href="#"><img src="components/com_fabrik/images/remove.png" label="<?php echo JText::_('REMOVE')?>" alt="<?php echo JText::_('REMOVE')?>" /></a>
				<?php endif; ?>
			</div>
			<?php endfor; ?>
			</div>
		</fieldset>
		</div>

		<div class="tab-pane" id="data-groupby">
			<fieldset class="form-horizontal">
			<?php
			foreach ($this->form->getFieldset('grouping') as $this->field):
				echo $this->loadTemplate('control_group');
		 	endforeach;
		 	?>
			</fieldset>
		</div>

		<div class="tab-pane" id="data-prefilter">
			<fieldset class="form-horizontal">
			<a class="btn" href="#" onclick="oAdminFilters.addFilterOption(); return false;">
				<i class="icon-plus-sign"></i> <?php echo JText::_('COM_FABRIK_ADD'); ?>
			</a>
			<?php foreach ($this->form->getFieldset('prefilter') as $this->field):
				echo $this->loadTemplate('control_group');
			 endforeach;
			 ?>
			<table class="adminform" width="100%">
				<tbody id="filterContainer">
				</tbody>
			</table>
			</fieldset>
		</div>

		<div class="tab-pane" id="data-joins">
			<fieldset>
			<legend>
				<?php echo JText::_('COM_FABRIK_JOINS');?>
			</legend>
			<?php if ($this->item->id != 0) { ?>
			<a href="#" id="addAJoin" class="addButton btn">
				<i class="icon-plus-sign"></i>  <?php echo JText::_('COM_FABRIK_ADD'); ?>
			</a>
			<div id="joindtd"></div>
			<?php
			foreach ($this->form->getFieldset('joins') as $this->field):
				echo $this->loadTemplate('control_group');
			endforeach;
			?>
			<?php
			} else {
					echo JText::_('COM_FABRIK_AVAILABLE_ONCE_SAVED');
			}
			?>
		</fieldset>
		</div>

		<div class="tab-pane" id="data-faceted">
			<fieldset>
				<?php
				foreach ($this->form->getFieldset('factedlinks') as $this->field) :
					echo $this->loadTemplate('control_group');
				endforeach;
				?>
			</fieldset>
		</div>

	</div>







</div>