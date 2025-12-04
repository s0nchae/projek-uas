<script src="{{ asset('adminlte/plugins/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('adminlte/dist/js/adminlte.min.js') }}"></script>

<script>
function allowDrop(ev) {
    ev.preventDefault();
}

function drag(ev) {
    ev.dataTransfer.setData("text", ev.target.id);
}

function drop(ev) {
    ev.preventDefault();
    const id = ev.dataTransfer.getData("text");
    const dragged = document.getElementById(id);
    const target = ev.target.closest(".tier-box");
    if (target) target.appendChild(dragged);
}

function submitTierList() {
    const merokok = {};
    const dampak = {};

    document.querySelectorAll('#cards-merokok .tier-box').forEach(box => {
        const tier = box.querySelector(".item-label").textContent.trim();
        const items = [...box.querySelectorAll('.item')].map(i => i.textContent.trim());
        merokok[tier] = items;
    });

    document.querySelectorAll('#cards-dampak .tier-box').forEach(box => {
        const tier = box.querySelector(".item-label").textContent.trim();
        const items = [...box.querySelectorAll('.item')].map(i => i.textContent.trim());
        dampak[tier] = items;
    });

    document.getElementById('tier_merokok').value = JSON.stringify(merokok);
    document.getElementById('tier_dampak').value = JSON.stringify(dampak);

    document.getElementById('tierForm').submit();
}
</script>
