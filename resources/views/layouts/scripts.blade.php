
@livewireScripts
<script src="https://cdn.jsdelivr.net/gh/livewire/turbolinks@v0.1.x/dist/livewire-turbolinks.js" data-turbolinks-eval="false"></script>

<script>
    toastr.options = {
        "positionClass": "toast-bottom-right",
        "preventDuplicates": true,
    }   
        
    window.livewire.on('success', param => {
        toastr[param['type']](param['message'],param['type']);
    });            
</script>