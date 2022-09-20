function getBreakpoint() {
  const w = window.innerWidth || document.documentElement.clientWidth || document.body.clientWidth;
  // eslint-disable-next-line no-nested-ternary
  return (w < 768) ? 'xs' : ((w < 992) ? 'sm' : ((w < 1200) ? 'md' : 'lg'));
}

function getSiblings(n) {
  return [...n.parentElement.children].filter((c) => c.nodeType === 1 && c !== n);
}

function isTouchDevice() {
  return (('ontouchstart' in window)
  || (navigator.maxTouchPoints > 0)
  || (navigator.msMaxTouchPoints > 0));
}

export { getBreakpoint, getSiblings, isTouchDevice };
