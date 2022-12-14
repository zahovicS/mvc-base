const Toast = Swal.mixin({
  toast: true,
  position: 'top-end',
  showConfirmButton: false,
  timer: 2000,
  timerProgressBar: true,
  didOpen: (toast) => {
    toast.addEventListener('mouseenter', Swal.stopTimer)
    toast.addEventListener('mouseleave', Swal.resumeTimer)
  },
})

const DEFAULT_ES_DATATABLE = {
  decimal: '',
  emptyTable: `<div class="d-block"></div><div class="d-block"><i class="fas fa-frown fa-lg"></i> No hay información</div>`,
  info: 'Mostrando _START_ a _END_ de _TOTAL_ datos',
  infoEmpty: 'Mostrando 0 a 0 de 0 datos',
  infoFiltered: '(Filtrado de _MAX_ total datos)',
  infoPostFix: '',
  thousands: ',',
  lengthMenu: 'Mostrar _MENU_ datos',
  loadingRecords: `<div class="d-block"><img src="${url}/img/loader3.gif" width="40px"/></div><div class="d-block">Recuperando datos...</div>`,
  processing: `<img src="${url}/img/loader.gif"/>`,
  search: 'Buscar:',
  zeroRecords: 'Sin resultados encontrados',
  paginate: {
    first: 'Primero',
    last: 'Ultimo',
    next: 'Siguiente',
    previous: 'Anterior',
  },
}
// not use this constant pls
const DEFAULT_DOM_DATATABLE =
  "<t<'container is-fluid p-0'<'columns'<'column is-half'i><'column is-half'p>>>>"

const get_person_dni = async (dni) => {
  if (!dni) return console.error('no puede buscar sin DNI.')
  return await axios({
    method: 'get',
    url: base_url + '/search/dni/' + dni,
  }).then(function (response) {
    return response
  })
}
const get_company_ruc = async (ruc) => {
  if (!ruc) return console.error('no puede buscar sin RUC.')
  return await axios({
    method: 'get',
    url: base_url + '/search/ruc/' + ruc,
  }).then(function (response) {
    return response
  })
}
const resetForm = (target) => {
  const form = document.querySelector(target)
  form.reset()
}
// not used functions
// const openModal = target => {
//   const modal = document.querySelector(target);
//   modal.classList.add("is-active");
//   document.documentElement.classList.add('is-clipped')
// }
// const hideModal = target => {
//   const modal = document.querySelector(target);
//   modal.classList.remove("is-active");
//   document.documentElement.classList.remove('is-clipped')
// }

// function ready(fn){var d=document;(d.readyState=='loading')?d.addEventListener('DOMContentLoaded',fn):fn();}
// get_person_dni('71748161')
// get_company_ruc('20514966631')
