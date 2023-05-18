import{ initializeApp }  from "https://www.gstatic.com/firebasejs/9.21.0/firebase-app.js";
import { getAnalytics } from "https://www.gstatic.com/firebasejs/9.21.0/firebase-analytics.js";
import { getAuth,onAuthStateChanged,signOut   } from "https://www.gstatic.com/firebasejs/9.21.0/firebase-auth.js";
import { getDatabase,set,ref,onValue } from "https://www.gstatic.com/firebasejs/9.21.0/firebase-database.js";
import { getFirestore,setDoc,doc,collection } from "https://www.gstatic.com/firebasejs/9.21.0/firebase-firestore.js";
import { getStorage,  ref as storageref,getDownloadURL,uploadBytes } from "https://www.gstatic.com/firebasejs/9.21.0/firebase-storage.js";
//variable
const btn = document.getElementById('search-btn')
const firebaseConfig = {
  apiKey: "AIzaSyDaLmLo0Z6BUd1wYpqTFgEks0liCL6kjlE",
  authDomain: "tntp-s-online-handb.firebaseapp.com",
  projectId: "tntp-s-online-handb",
  storageBucket: "tntp-s-online-handb.appspot.com",
  messagingSenderId: "699284847876",
  appId: "1:699284847876:web:5d340338d3b559f880a451",
  measurementId: "G-531EMCZKBV"
};

const app = initializeApp(firebaseConfig);
const analytics = getAnalytics(app);
const database = getDatabase(app)
const storage = getStorage(app)
const auth = getAuth()


onAuthStateChanged(auth, (user) => {
  if (user) {
    
    // User is signed in, see docs for a list of available properties
    // https://firebase.google.com/docs/reference/js/firebase.User
    const uid = user.uid;
    console.log(uid);
    const starCountRef = ref(database, 'users/' +uid);
    onValue(starCountRef, (snapshot) => {
    const data = snapshot.val();
    print_user(data,uid)
},{
onlyOnce : true
});
  } else {
    window.location.replace("../login and sign up/index.html")
    // User is signed out
    // ...
  }
});

function print_user(data,uid){
  console.log(uid);
  console.log(data);
  let photo;
  var str = new String(data.avatar)
console.log(str.split(",")[0]);
if(data.avatar.includes(',')){
getDownloadURL(storageref(storage, 'avatar/'+ str.split(",")[0]))
.then((url) => {
  // `url` is the download URL for 'images/stars.jpg'

  // This can be downloaded directly:
  // const xhr = new XMLHttpRequest();
  // xhr.responseType = 'blob';
  // xhr.onload = (event) => {
  //   const blob = xhr.response;
  // };
  // xhr.open('GET', url);
  // xhr.send();
  photo = url
  sidenav(photo)
  })
}else if(data.avatar == "none" || data.avatar == null){
    photo = '../user.png'
    
  }else{
    photo = data.avatar
  }
  sidenav(photo)
  function sidenav(photo){
    console.log(photo);
    document.getElementById('img').src = photo
    document.getElementById('href').href += `?id=${uid}`
  }
}
//sign-out
const sign_out_btn = document.getElementById("sign-out")
sign_out_btn.addEventListener("click",()=>{
  signOut(auth).then(() => {
    // Sign-out successful.
  }).catch((error) => {
    console.log(error);
    // An error happened.
  });
})
btn.addEventListener('click',()=>{
  var value_input = document.getElementById('search').value.toLowerCase()
  if(value_input == '' || value_input ==0){
    alert('search input cannot be empty')
  }else{
    window.location.replace(`../search_result/index.html?search_value=${value_input}`)

  }
})