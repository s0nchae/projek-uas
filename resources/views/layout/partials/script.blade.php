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

window.addEventListener("beforeunload", function () {
    localStorage.setItem("scrollPosition", window.scrollY);
});

// === KEMBALIKAN POSISI SCROLL SAAT HALAMAN SELESAI DILOAD ===
window.addEventListener("load", function () {
    const savedPosition = localStorage.getItem("scrollPosition");
    
    if (savedPosition !== null) {
        window.scrollTo(0, parseInt(savedPosition));
    }
});

// Untuk AdminLTE: kita scroll pada elemen .content-wrapper
const wrapper = document.querySelector('.content-wrapper');

// Pastikan elemen ada
if (wrapper) {
    // Simpan posisi scroll
    wrapper.addEventListener('scroll', function () {
        sessionStorage.setItem('wrapperScroll', wrapper.scrollTop);
    });

    // Pulihkan scroll secepat mungkin
    document.addEventListener('DOMContentLoaded', function () {
        const pos = sessionStorage.getItem('wrapperScroll');
        if (pos !== null) {
            wrapper.scrollTop = parseInt(pos);
        }
    });
}


</script>
