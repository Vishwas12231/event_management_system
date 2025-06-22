// src/components/EventList.js
import React, { useEffect, useState } from 'react';
import axios from 'axios';
import EventSection from './EventSection';
import './EventList.css';

const EventList = () => {
  const [events, setEvents] = useState({ today: [], future: [], past: [] });
  const [expanded, setExpanded] = useState({ today: true, future: true, past: false });

  const fetchEvents = async () => {
    try {
      const res = await axios.get('http://127.0.0.1:8000/api/events');
      setEvents(res.data);
    } catch (err) {
      console.error('Failed to fetch events:', err);
    }
  };

  useEffect(() => {
    fetchEvents();
  }, []);

  return (
    <div className="event-container">
      <h1>📅 Event Management</h1>
      <button className="refresh-btn" onClick={fetchEvents}>🔄 Refresh Events</button>

      <EventSection
        title="Today's Events"
        events={events.today || []}
        isExpanded={expanded.today}
        onToggle={() => setExpanded(prev => ({ ...prev, today: !prev.today }))}
      />

      <EventSection
        title="Future Events"
        events={events.future || []}
        isExpanded={expanded.future}
        onToggle={() => setExpanded(prev => ({ ...prev, future: !prev.future }))}
      />

      <EventSection
        title="Past Events"
        events={events.past || []}
        isExpanded={expanded.past}
        onToggle={() => setExpanded(prev => ({ ...prev, past: !prev.past }))}
      />
    </div>
  );
};

export default EventList;
