<style>
    .img svg {
        width: 250px;
        height: 250px;
    }
</style>
<h2 class="text-center">Сегодня <?php echo $params['date'] ?></h2>
<h5 class="border-info">Минимальная температура :<?php echo $params['min_tempa'] ?></h5>
<h5 class="border-info">Максимальная температура :<?php echo $params['max_tempa'] ?></h5>
<?php echo $params['img'] ?>
<table class="table">
    <thead>
    <tr>
        <th scope="col">Время</th>
		<?php foreach ($params['details']['0'] as $time) {
			echo "<th scope='col'>" . $time . "</th>";
		} ?>
    </tr>
    </thead>
    <tbody>
    <tr>
        <th scope="row">Температура</th>
		<?php foreach ($params['details']['1'] as $tempa) {
			echo "<td>" . $tempa . "</td>";
		} ?>
    </tr>
    <tr>
        <th scope="row">Ветер, м/с</th>
		<?php foreach ($params['details']['2'] as $veter) {
			echo "<td>" . $veter . "</td>";
		}
		?>
    </tr>
    <tr>
        <th scope="row">Осадки, мм</th>
		<?php foreach ($params['details']['3'] as $fallout) {
			echo "<td>" . $fallout . "</td>";
		}
		?>
    </tr>
    </tbody>
</table>
