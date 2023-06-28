<div class="m-3">
<form action="<?php echo 'pay-send'; ?>" method="post">
	<div class="row">
		<div class="col-4">
	<label for="name" class="form-label">Amount: </label><br>
	<input type="text" id="name" name="amount"  class="form-control" ><br>
		</div>
		<div class="col-4">
	<label for="drop" class="form-label">Payment Type:</label>
	<select name="payment_id" id="drop" class="form-select">
		<?php
		$this->load->database(); // Load the database library
		$this->load->model('Payment_model');
		$this->load->model('Currency_model');
		$payments = $this->Payment_model->get_all_payments();
		$currencies = $this->Currency_model->get_all_currencies();
		foreach ($payments as $payment): ?>
			<option value="<?= $payment['id']?>"><?= $payment['payment']; ?></option>
		<?php endforeach;?>
	</select>
		</div>
		<div class="col-4">
	<label for="drop" class="form-label">Payment Type:</label>
	<select name="currency_id" id="drop"  class="form-select">
		<?php foreach ($currencies as $currency): ?>
			<option value="<?= $currency['id']?>"><?= $currency['name']; ?></option>
		<?php endforeach;?>
	</select>
		</div>
		<div class="col-4">
	<label for="name" class="form-label">Feedback: </label><br>
	<input type="text" id="name" name="feedback"  class="form-control" ><br>
		</div>
		<div class="col-4">
	<label for="name" class="form-label">Income: </label><br>
	<input type="text" id="name" name="income"  class="form-control" ><br>
		</div>
		<div class="col-4">
	<label for="name" class="form-label">Expense: </label><br>
	<input type="text" id="name" name="expense"  class="form-control" ><br>
		</div>
	<input type="submit" value="Send" class="btn btn-primary">
</form>
