
<script>
    $(document).ready(function() {
        $('.area-show-image').mouseover(function() {
            $(this).ezPlus({
                zoomType: 'lens',
                lensShape: 'round',
                lensSize: 200
            });
        })
    });
</script>