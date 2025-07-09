const { useState } = React;

function ReportForm() {
  const [status, setStatus] = useState('');

  const handleSubmit = async (e) => {
    e.preventDefault();
    const formData = new FormData(e.target);
    const res = await fetch('/api/report.php', { method: 'POST', body: formData });
    const data = await res.json();
    if (data.success) {
      setStatus('Report submitted. Your folio: ' + data.folio);
    } else {
      setStatus('Error: ' + data.error);
    }
  };

  return (
    React.createElement('form', { onSubmit: handleSubmit, className: 'p-4 max-w-lg mx-auto' },
      React.createElement('h1', { className: 'text-2xl mb-4 text-center text-burgundy' }, 'Zacapu Escucha'),
      React.createElement('label', { className: 'block mb-2' }, 'Report Type'),
      React.createElement('select', { name: 'type', className: 'border p-2 w-full mb-4' },
        ['Complaint','Suggestion','Citizen Report','Police Report','Corruption Report','Trash Issue','Water Leak'].map(t =>
          React.createElement('option', { key: t }, t)
        )
      ),
      React.createElement('label', { className: 'block mb-2' },
        React.createElement('input', { type: 'checkbox', name: 'anonymous', className: 'mr-2' }),
        'Anonymous'
      ),
      React.createElement('input', { type: 'text', name: 'name', placeholder: 'Full name', className: 'border p-2 w-full mb-4' }),
      React.createElement('input', { type: 'text', name: 'contact', placeholder: 'Phone or email', className: 'border p-2 w-full mb-4' }),
      React.createElement('textarea', { name: 'description', placeholder: 'Description', className: 'border p-2 w-full mb-4' }),
      React.createElement('input', { type: 'file', name: 'file', className: 'mb-4' }),
      React.createElement('button', { type: 'submit', className: 'bg-burgundy text-white px-4 py-2' }, 'Submit'),
      status && React.createElement('p', { className: 'mt-4' }, status)
    )
  );
}

ReactDOM.render(React.createElement(ReportForm), document.getElementById('root'));
