import React, {useState} from 'react';
import ProfileList from './components/ProfileList';
import TaskList from './components/TaskList';

export default function App(){
  const [selectedProfile, setSelectedProfile] = useState(null);
  return (
    <div className="p-6 max-w-4xl mx-auto">
      <h1 className="text-2xl mb-4">Time Manager</h1>
      <div className="grid grid-cols-3 gap-4">
        <div className="col-span-1">
          <ProfileList onSelect={p=>setSelectedProfile(p)} />
        </div>
        <div className="col-span-2">
          <TaskList profile={selectedProfile} />
        </div>
      </div>
    </div>
  );
}