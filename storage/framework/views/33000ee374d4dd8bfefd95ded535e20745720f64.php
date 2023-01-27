<?php $attributes = $attributes->exceptProps([
    'album' => null,
    'style'=>"",
    'text' =>'Add Photo'
]); ?>
<?php foreach (array_filter(([
    'album' => null,
    'style'=>"",
    'text' =>'Add Photo'
]), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
} ?>
<?php $__defined_vars = get_defined_vars(); ?>
<?php foreach ($attributes as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
} ?>
<?php unset($__defined_vars); ?>


<style>
    #photo-upload-form
    {
        display: flex;
        align-items: center;
        flex-direction: column;
        justify-content: center;
        width:100%;
        gap: 8px;
    }
</style>




<form id="photo-upload-form" <?php echo e($album? "action=/albums/$album->id/photos":'action=photos'); ?> method="post" enctype="multipart/form-data">
    
        <input class="uploadBtn" style="background-color: transparent" type="file" name="photo"  id="uploadInput">
        <div style="display: flex">
            <input type="text" name="name" placeholder="photo name" required>
            <input class="uploadBtn" type="submit" value="upload">
        </div>
    <?php echo csrf_field(); ?>
</form>
<?php /**PATH /media/lap/linux space/Folders/Mohamed/portfolio/projects/album-viewer/resources/views/components/upload-photo.blade.php ENDPATH**/ ?>