import { useState } from 'react'
import './App.css'
import AppHeader from './components/layout/Header'

function App() {
  const [count, setCount] = useState(0)

  return (
    <div>
      <AppHeader />
    </div>
  )
}

export default App
