<p>
    <label for="<?php echo $args["title"]["id"] ?>"><?php _e( 'Title:' ); ?></label> 
    <input class="widefat" id="<?php echo $args["title"]["id"]; ?>" name="<?php echo $args["title"]["name"]; ?>" type="text" value="<?php echo $args["title"]["value"]; ?>" />

    <?php if (count($args['forms']) > 0 ): ?>
        <select class="widefat"  name="<?php echo $args["form"]["name"]; ?>" id="<?php echo $args["form"]["id"]; ?>">
            <option value="0"><?php echo __('Valitse lomake', 'educationhub') ?></option>
            <?php foreach ($args['forms'] as $form): ?>
                <option value="<?php echo $form['id'] ?>" <?php echo $form['selected'] ?>><?php echo $form["title"] ?></option>
            <?php endforeach; ?>
        </select>
    <?php else: ?>
    <?php endif; ?>
</p>