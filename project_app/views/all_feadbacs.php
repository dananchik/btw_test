<?php
foreach ($params['feadbacks'] as $key => $array):?>

    <div class="card col-12">
        <div class="card-body">
            <h5 class="card-title"><?php echo $array['subject'] ?></h5>
            <h6 class="card-subtitle mb-2 text-muted"><?php echo $array['time'] ?></h6>
            <p class="card-text"><?php echo $array['text'] ?></p>
        </div>
    </div>
<?php endforeach; ?>
