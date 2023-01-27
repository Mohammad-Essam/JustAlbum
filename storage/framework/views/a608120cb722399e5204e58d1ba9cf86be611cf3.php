<div class="image">
    <a target="_blank" href="/<?php echo e($photo->path); ?>"><img src="/<?php echo e($photo->path); ?>" alt="" srcset=""></a>
    <form method="POST" action="<?php echo e($photo->id); ?>/delete">
        <p style="margin-top: auto"><?php echo e($photo->name); ?></p>
        <input type="submit" value="Delete">
        <?php echo csrf_field(); ?>
    </form>
</div>
<?php /**PATH /media/lap/linux space/Folders/Mohamed/portfolio/projects/album-viewer/resources/views/components/photo.blade.php ENDPATH**/ ?>