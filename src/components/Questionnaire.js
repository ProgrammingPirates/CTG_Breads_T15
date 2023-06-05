import React from 'react';
import { Link } from 'react-router-dom';

const Questionnaire = () => {
  return (
    <div className="questionnaire">
      <h2>Non-Judgmental Questionnaire</h2>
      {/* Add your questionnaire code here */}
      <Link to="/counseling" className="button">Next</Link>
    </div>
  );
};

export default Questionnaire;
