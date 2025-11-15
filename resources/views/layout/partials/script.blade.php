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
  const data = ev.dataTransfer.getData("text");
  const draggedItem = document.getElementById(data);
  const dropTarget = ev.target.closest(".tier-box");
  if (dropTarget) dropTarget.appendChild(draggedItem);
}

function submitTierList() {
  const merokokData = {};
  const dampakData = {};

  // Ambil data MEROKOK
  document.querySelectorAll('#cards-merokok .tier-box').forEach(box => {
    const tier = box.querySelector(".item-label").textContent.trim();
    const items = Array.from(box.querySelectorAll('.item')).map(i => i.textContent.trim());
    merokokData[tier] = items;
  });

  // Ambil data DAMPAK
  document.querySelectorAll('#cards-dampak .tier-box').forEach(box => {
    const tier = box.querySelector(".item-label").textContent.trim();
    const items = Array.from(box.querySelectorAll('.item')).map(i => i.textContent.trim());
    dampakData[tier] = items;
  });

  document.getElementById('tier_merokok').value = JSON.stringify(merokokData);
  document.getElementById('tier_dampak').value = JSON.stringify(dampakData);

  document.getElementById('tierForm').submit();
}


document.getElementById('form').addEventListener('submit', function() {
    console.log("Menyimpan posisi scroll:", window.scrollY);
    localStorage.setItem('scrollPosition', window.scrollY);
});

document.addEventListener('DOMContentLoaded', function () {
    const savedPosition = localStorage.getItem('scrollPosition');
    console.log("Posisi scroll yang diambil dari localStorage:", savedPosition);
    if (savedPosition) {
        window.scrollTo(0, savedPosition);
    }
});


<script>
function openKalkulator() {
    // Tidak melakukan scroll apapun (agar aman)
    // Jika ingin ke bawah, boleh mengaktifkan scroll manual
    var el = document.getElementById("Kalkulator");
    if (el) {
        // Scroll manual, tidak meloncat
        el.scrollIntoView({ behavior: "smooth", block: "start" });
    }
}

// Mencegah scroll ke atas setelah submit form
window.addEventListener('beforeunload', function() {
    // simpan posisi scroll saat keluar
    localStorage.setItem('scrollPos', window.scrollY);
});

window.addEventListener('load', function() {
    // kembalikan scroll setelah reload Laravel
    let pos = localStorage.getItem('scrollPos');
    if (pos) window.scrollTo(0, pos);
});
</script>

</script>
