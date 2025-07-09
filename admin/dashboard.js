fetch('/api/list_reports.php')
  .then(res => res.json())
  .then(data => {
    const reports = document.getElementById('reports');
    data.forEach(r => {
      const tr = document.createElement('tr');
      tr.innerHTML = `<td class='border px-2'>${r.folio}</td><td class='border px-2'>${r.type}</td><td class='border px-2'>${r.status}</td>`;
      reports.appendChild(tr);
    });
  });
