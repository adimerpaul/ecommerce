import {Dialog, Notify} from 'quasar'
export class Alert {
  static success (message) {
    Notify.create({
      progress: true,
      progressClass: 'bg-positive',
      color: 'white',
      textColor: 'black',
      position: 'top-right',
      message,
      icon: 'check_circle',
      iconColor: 'positive',
      timeout: 1000,
      actions: [{ icon: 'close', color: 'grey', size: 'sm', round: true, dense: true }]
    })
  }

  static dialog (message) {
    return Dialog.create({
      title: 'Confirmación',
      message,
      // position: 'top',
      color: 'positive',
      ok: {
        label: 'Aceptar',
        color: 'positive'
      },
      cancel: {
        label: 'Cancelar',
        color: 'negative'
      },
    })
  }

  static confirm (message) {
    return Dialog.create({
      title: '<span style="color: red">Confirmación</span>',
      message,
      html: true,
      // position: 'top',
      color: 'positive',
      ok: {
        label: 'Aceptar',
        color: 'positive',
        push: true
      },
      cancel: {
        label: 'Cancelar',
        color: 'negative',
        push: true
      },
    })
  }

  static promptPassword (message) {
    return Dialog.create({
      title: 'Confirmación',
      message,
      prompt: {
        model: '',
        type: 'password',
        placeholder: 'Escribe algo',
      },
      color: 'positive',
      ok: {
        label: 'Aceptar',
        color: 'positive'
      },
      cancel: {
        label: 'Cancelar',
        color: 'negative'
      },
    })
  }

  static error (message) {
    Notify.create({
      progress: true,
      color: 'negative',
      position: 'top',
      message,
      timeout: 1500,
      actions: [{ icon: 'close', color: 'white', size: 'sm' }]
    })
  }

  static warning (message) {
    Notify.create({
      progress: true,
      color: 'warning',
      position: 'top',
      message,
      timeout: 1500,
      actions: [{ icon: 'close', color: 'white', size: 'sm' }]
    })
  }
}