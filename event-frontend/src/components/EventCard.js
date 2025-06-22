// src/components/EventCard.js
import React from 'react';
import './EventCard.css';

const EventCard = ({ event }) => (
  <div className="event-card">
    <h3>{event.title}</h3>
    <p>{event.description}</p>
    <p><strong>Date:</strong> {event.date} {event.time && `at ${event.time}`}</p>
    {event.location && <p><strong>Location:</strong> {event.location}</p>}
  </div>
);

export default EventCard;
