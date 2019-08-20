<?php include('app/views/partials/header.php'); ?>


<div class="col-lg-8">

	<h2 class="display-4 bottom-margin-20">Contact</h2>

	<?php if(isset($_GET['msg']))

		echo "<p class='text-danger'>" . $_GET['msg'] . "</p>";

		?>


          <form class="form-horizontal" action="/core/database/contact.php" method="post">
          <fieldset>
            <!-- Name input-->
            <div class="form-group">
                <input id="name" name="name" type="text" placeholder="Name" class="form-control">
            </div>

            <!-- Email input-->
            <div class="form-group">

                <input id="email" name="email" type="text" placeholder="Email" class="form-control">
            </div>


            <!-- Message body -->
            <div class="form-group">

                <textarea class="form-control" id="message" name="message" placeholder="Message" rows="5"></textarea>

            </div>

            <!-- Form actions -->
            <div class="form-group text-right">

                <button type="submit" name="submit" value="submit" class="btn btn-primary btn-md">Submit</button>

            </div>

          </fieldset>

          </form>

	</div>

<?php include('app/views/partials/footer.php'); ?>
