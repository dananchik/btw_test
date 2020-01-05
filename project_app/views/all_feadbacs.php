<div class="card-group"><?php
    foreach ($params['feadbacks'] as $key => $array):?>

        <div class="card">
            <div class="card-body">
                <h5 class="card-title"><?php echo $array['subject'] ?></h5>
                <p class="card-text"><?php echo $array['text'] ?></p>
                <p class="card-text"><small class="text-muted"><?php echo $array['time'] ?></small></p>
            </div>
        </div>

    <?php endforeach; ?>    </div>