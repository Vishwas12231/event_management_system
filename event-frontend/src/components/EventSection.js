// src/components/EventSection.js
import React from 'react';
import EventCard from './EventCard';
import './EventSection.css';

const EventSection = ({ title, events, isExpanded, onToggle }) => (
  <div className="event-section">
    <div className="section-header" onClick={onToggle}>
      <h2>{title} ({events.length})</h2>
      <span>{isExpanded ? '−' : '+'}</span>
    </div>
    {isExpanded && (
      <div className="section-content">
        {events.length > 0 ? (
          events.slice(0, 3).map(event => (
            <EventCard key={event.id} event={event} />
          ))
        ) : (
          <p className="no-events">No events available.</p>
        )}
      </div>
    )}
  </div>
);

export default EventSection;
