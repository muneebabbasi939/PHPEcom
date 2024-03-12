<?php
session_start();
if (isset($_SESSION['auth'])) {
	$_SESSION['message'] = "You are already Logged In";
	header("location:index.php");
	exit();
}
include('includes/header.php');
?>
<style>
	.container-fluid{
		background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' version='1.1' xmlns:xlink='http://www.w3.org/1999/xlink' xmlns:svgjs='http://svgjs.dev/svgjs' width='1440' height='560' preserveAspectRatio='none' viewBox='0 0 1440 560'%3e%3cg mask='url(%26quot%3b%23SvgjsMask1008%26quot%3b)' fill='none'%3e%3crect width='1440' height='560' x='0' y='0' fill='%230e2a47'%3e%3c/rect%3e%3cpath d='M1008.59 371.77 a53.86 53.86 0 1 0 107.72 0 a53.86 53.86 0 1 0 -107.72 0z' fill='%23037b0b'%3e%3c/path%3e%3cpath d='M566.37 252.47a34.53 34.53 0 1 0-65.47-21.97z' fill='%23037b0b'%3e%3c/path%3e%3cpath d='M602.25 147.34L658.19 147.34L658.19 164.87L602.25 164.87z' fill='%23037b0b'%3e%3c/path%3e%3cpath d='M416.89 232.05a55.25 55.25 0 1 0 108.64 20.18z' stroke='%23037b0b'%3e%3c/path%3e%3cpath d='M650.09 226.7L686.77 226.7L686.77 263.38L650.09 263.38z' stroke='%23d3b714'%3e%3c/path%3e%3cpath d='M1098.06 291.76L1113.07 291.76L1113.07 295.38L1098.06 295.38z' fill='%23037b0b'%3e%3c/path%3e%3cpath d='M224.12 153.4L235.98 153.4L235.98 165.26L224.12 165.26z' fill='%23037b0b'%3e%3c/path%3e%3cpath d='M651.13 539.75 a27.22 27.22 0 1 0 54.44 0 a27.22 27.22 0 1 0 -54.44 0z' stroke='%23e73635'%3e%3c/path%3e%3cpath d='M775.35 43.98L787.28 43.98L787.28 55.91L775.35 55.91z' fill='%23d3b714'%3e%3c/path%3e%3cpath d='M226.07 527.11 a46.28 46.28 0 1 0 92.56 0 a46.28 46.28 0 1 0 -92.56 0z' fill='%23d3b714'%3e%3c/path%3e%3cpath d='M816.76 289.52L822.85 289.52L822.85 295.61L816.76 295.61z' fill='%23037b0b'%3e%3c/path%3e%3cpath d='M1081.85 74.57L1095.61 74.57L1095.61 88.33L1081.85 88.33z' fill='%23d3b714'%3e%3c/path%3e%3cpath d='M866.14 233.65L870.37 233.65L870.37 237.88L866.14 237.88z' fill='rgba(193%2c 1%2c 226%2c 1)'%3e%3c/path%3e%3cpath d='M1345 134.49a12.94 12.94 0 1 0-22.55 12.71z' fill='%23e73635'%3e%3c/path%3e%3cpath d='M186.23 46.87 a9.51 9.51 0 1 0 19.02 0 a9.51 9.51 0 1 0 -19.02 0z' stroke='%23037b0b'%3e%3c/path%3e%3cpath d='M37.04 137.46L57.66 137.46L57.66 188.86L37.04 188.86z' fill='%23e73635'%3e%3c/path%3e%3cpath d='M454.78 222.34a3.83 3.83 0 1 0-2.64 7.2z' fill='%23037b0b'%3e%3c/path%3e%3cpath d='M1093.69 28.58L1115.84 28.58L1115.84 51.32L1093.69 51.32z' fill='%23e73635'%3e%3c/path%3e%3cpath d='M885.78 506.3L932.26 506.3L932.26 545.51L885.78 545.51z' fill='%23d3b714'%3e%3c/path%3e%3cpath d='M1116.53 16.38L1161.24 16.38L1161.24 61.09L1116.53 61.09z' stroke='%23d3b714'%3e%3c/path%3e%3cpath d='M700.95 271.34L707.27 271.34L707.27 277.66L700.95 277.66z' fill='%23e73635'%3e%3c/path%3e%3cpath d='M1101.08 59.84L1109.21 59.84L1109.21 67.97L1101.08 67.97z' stroke='rgba(193%2c 1%2c 226%2c 1)'%3e%3c/path%3e%3cpath d='M748.16 252.21L784.09 252.21L784.09 257.87L748.16 257.87z' stroke='rgba(193%2c 1%2c 226%2c 1)'%3e%3c/path%3e%3cpath d='M856.11 421.56L888.29 421.56L888.29 453.74L856.11 453.74z' fill='%23037b0b'%3e%3c/path%3e%3cpath d='M1068.09 329.58L1113.38 329.58L1113.38 374.87L1068.09 374.87z' fill='%23037b0b'%3e%3c/path%3e%3cpath d='M467.99 527.88a1.05 1.05 0 1 0-1.58-1.37z' fill='%23037b0b'%3e%3c/path%3e%3cpath d='M1099.2 208.15L1109.53 208.15L1109.53 245.61L1099.2 245.61z' stroke='%23e73635'%3e%3c/path%3e%3cpath d='M695.59 115.32a43.75 43.75 0 1 0-78.03-39.6z' stroke='%23e73635'%3e%3c/path%3e%3cpath d='M404.43 506.26L416.72 506.26L416.72 559.09L404.43 559.09z' stroke='%23d3b714'%3e%3c/path%3e%3cpath d='M678.55 462.37L693.02 462.37L693.02 476.84L678.55 476.84z' stroke='%23e73635'%3e%3c/path%3e%3cpath d='M397.54 463.11a20.28 20.28 0 1 0-6.64-40.02z' stroke='%23e73635'%3e%3c/path%3e%3cpath d='M878.53 170.95 a7.79 7.79 0 1 0 15.58 0 a7.79 7.79 0 1 0 -15.58 0z' stroke='%23037b0b'%3e%3c/path%3e%3cpath d='M540.23 530.41 a8.16 8.16 0 1 0 16.32 0 a8.16 8.16 0 1 0 -16.32 0z' stroke='%23d3b714'%3e%3c/path%3e%3c/g%3e%3cdefs%3e%3cmask id='SvgjsMask1008'%3e%3crect width='1440' height='560' fill='white'%3e%3c/rect%3e%3c/mask%3e%3c/defs%3e%3c/svg%3e");
	}
	.card{
		background-color: black;
	}
	.card-header{
		background-color: #ff6219;
	}
	.btn{
		background-color: #ff6219;
	}
</style>
<div class="container-fluid py-5">
	<div class="row justify-content-center">
		<div class="col-md-6">
			<?php
			if (isset($_SESSION['message'])) {
				?>
				<div class="alert alert-warning alert-dismissible fade show" role="alert">
					<strong>Hey!</strong>
					<?= $_SESSION['message']; ?>.
					<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
				</div>
				<?php
				unset($_SESSION['message']);
			}
			;
			?>
			<div class="card  text-white">
				<div class="card-header shadow">
					<h3>Registration Form</h3>
				</div>
				<div class="card-body">
					<form action="functions/authcode.php" method="POST">
						<div class="mb-3">
							<label class="form-label">Name</label>
							<input type="text" name="name" class="form-control" placeholder="Enter your name">
						</div>
						<div class="mb-3">
							<label for="exampleInputEmail1" class="form-label">Email address</label>
							<input type="email" class="form-control" name="email" placeholder="Enter your email"
								id="exampleInputEmail1" aria-describedby="emailHelp">
						</div>
						<div class="mb-3">
							<label class="form-label">Phone</label>
							<input type="number" class="form-control" name="phone"
								placeholder="Enter your phone number">
						</div>
						<div class="mb-3">
							<label for="exampleInputPassword1" class="form-label">Password</label>
							<input type="password" class="form-control" name="password" placeholder="Enter password"
								id="exampleInputPassword1">
						</div>
						<div class="mb-3">
							<label class="form-label">Confirm Password</label>
							<input type="password" class="form-control" name="cpassword" placeholder="Confirm Password">
						</div>
						<div class="mb-3">
							<label class="form-label">Role As</label>
							<select class="form-select form-control mb-3" id="user_type" name="role_as"
								aria-label="Default select example">
								<option selected value="user">User</option>
								<option value="admin">Admin</option>
							</select>
						</div>

						<button type="submit" name="register_btn" class="btn text-white">Register</button>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
<?php include('includes/footer.php') ?>