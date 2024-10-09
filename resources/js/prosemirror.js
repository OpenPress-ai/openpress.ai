import { initProseMirror } from './prosemirror-init'

let initialized = false
let currentPageUrl = window.location.href
let isBackNavigation = false

// Listen for popstate event (triggered on back/forward navigation)
window.addEventListener('popstate', () => {
  isBackNavigation = true
})

function initWithDelay() {
  console.log("Called initWithDelay")

  // Check if we've navigated to a new page
  if (currentPageUrl !== window.location.href) {
    console.log("New page detected")
    if (isBackNavigation) {
      console.log("Back navigation detected, skipping reinitialization")
      isBackNavigation = false // Reset the flag
      return
    }
    console.log("Reinitializing")
    initialized = false
    currentPageUrl = window.location.href
  }

  if (initialized) {
    console.log("Already initialized on this page, skipping")
    return
  }

  initialized = true
  console.log("Setting up initialization")

  setTimeout(() => {
    console.log("Initializing ProseMirror")
    initProseMirror()
  }, 1)
}

document.addEventListener('DOMContentLoaded', initWithDelay)

document.addEventListener('livewire:navigated', () => {
  isBackNavigation = false // Reset the flag for Livewire navigation
  initWithDelay()
})

// Fallback for turbo drive navigation
document.addEventListener('turbo:load', () => {
  isBackNavigation = false // Reset the flag for Turbo navigation
  initWithDelay()
})

// New event listener for custom event
document.addEventListener('reinitialize-prosemirror', initWithDelay)

// Expose initWithDelay function globally
window.initializeProseMirror = initWithDelay

export { initWithDelay }