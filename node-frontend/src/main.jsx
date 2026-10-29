import React from "react";
import { createRoot } from "react-dom/client";
import "./style.css";

function App() {
  return (
    <main className="preview">
      <section className="hero" aria-labelledby="app-title">
        <div className="react-icon" aria-hidden="true">
          ⚛
        </div>
        <div className="hero-copy">
          <h1 id="app-title">React 18 + Vite Production Build</h1>
          <p className="subtitle">Served via Alpine NGINX multi-stage container</p>
        </div>
        <p className="status">
          <span>Status:</span>
          <span className="status-dot" aria-hidden="true" />
          <span>Production bundle loaded</span>
        </p>
      </section>

      <section className="details" aria-label="Application details">
        <article className="detail-card">
          <p className="label">Component State</p>
          <p className="value cyan">Reactive Hydrated</p>
        </article>
        <article className="detail-card">
          <p className="label">Serving Server</p>
          <p className="value green">nginx/1.27-alpine</p>
        </article>
      </section>
    </main>
  );
}

createRoot(document.getElementById("root")).render(
  <React.StrictMode>
    <App />
  </React.StrictMode>,
);
