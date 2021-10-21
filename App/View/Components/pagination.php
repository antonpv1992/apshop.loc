<?php if (isset($pagination) && $pagination->countPages > 1): ?>
    <?=$pagination->display();?>
<?php endif; ?>