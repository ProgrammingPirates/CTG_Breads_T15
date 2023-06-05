import React from 'react';
import { Link } from 'react-router-dom';

const Notifications = () => {
  return (
    <div className="notifications">
      <h2>Notifications and Reminders</h2>
      {/* Add your notifications code here */}
      <Link to="/confidentiality" className="button">Next</Link>
    </div>
  );
};

export default Notifications;
