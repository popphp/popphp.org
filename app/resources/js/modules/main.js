function copyCode (a) {
  return {
    copy: a => {
      const siblings = a.parentNode.childNodes

      for (let i = 0; i < siblings.length; i++) {
        if (siblings[i].nodeName === 'CODE') {
          navigator.clipboard.writeText(siblings[i].innerText)
          return
        }
      }
    }
  }
}

export { copyCode }
