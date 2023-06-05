import React from 'react';
import { Link } from 'react-router-dom';

const DataConfidentiality = () => {
  return (
    <div className="data-confidentiality">
      <h2>Data Confidentiality</h2>
      {/* Add your data confidentiality code here */}
      <Link to="/engagement" className="button">Next</Link>
    </div>
  );
};

export default DataConfidentiality;
