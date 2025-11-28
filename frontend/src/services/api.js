import axios from 'axios';
const api = axios.create({ baseURL: import.meta.env.VITE_API_URL || 'http://localhost:8000/api', withCredentials:true });
export default {
  login: (data) => api.post('/login', data),
  register: (data) => api.post('/register', data),
  getProfiles: () => api.get('/profiles'),
  getTasks: (profileId) => api.get(`/profiles/${profileId}/tasks`),
  createTask: (profileId, payload) => api.post(`/profiles/${profileId}/tasks`, payload),
  updateTask: (profileId, taskId, payload) => api.put(`/profiles/${profileId}/tasks/${taskId}`, payload),
  deleteTask: (profileId, taskId) => api.delete(`/profiles/${profileId}/tasks/${taskId}`)
};