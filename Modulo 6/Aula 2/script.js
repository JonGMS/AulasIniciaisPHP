

function ValidarCPF() {
  const cpf = document.getElementById('id_cpf').value;

  const cpfLimpo = cpf.replace(/\D/g, '');

  if (cpfLimpo.length !== 11) {
    alert("CPF inválido. Deve ter 11 números.");
    return false;
  }

  if (!/^\d+$/.test(cpfLimpo)) {
    alert("CPF deve conter apenas números.");
    return false;
  }

  alert("CPF válido (estrutura)");
  return true; 
}
