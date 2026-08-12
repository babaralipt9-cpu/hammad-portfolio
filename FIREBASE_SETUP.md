# Firebase Setup Guide for Hammad Portfolio

## Step 1: Create Firebase Project
1. Go to https://console.firebase.google.com
2. Click **+ Add project**
3. Name: `hammad-portfolio`
4. Click **Continue** → Disable Google Analytics → **Create project**

## Step 2: Set Up Realtime Database
1. In Firebase Console, click **Realtime Database** (left menu)
2. Click **Create Database**
3. Choose **Start in test mode** (for now)
4. Location: `us-central1` → **Enable**

## Step 3: Get Your Database URL
1. Go to **Realtime Database** tab
2. Copy the URL at the top (looks like: `https://hammad-portfolio-xxxxx.firebaseio.com`)
3. Save this URL - you'll need it for `.env.local`

## Step 4: Create Service Account Key
1. Click **⚙️ Settings** (top-left) → **Project Settings**
2. Go to **Service Accounts** tab
3. Click **Generate New Private Key**
4. A JSON file downloads - keep it safe (contains credentials)

## Step 5: Add to Your Project
1. In terminal, run:
```bash
cd d:\hammad-portfolio-single
```

2. Create `.env.local` file and add:
```
FIREBASE_DATABASE_URL=https://YOUR-PROJECT.firebaseio.com
FIREBASE_API_KEY=YOUR_API_KEY
```

3. Get API Key from Firebase Console:
   - **⚙️ Settings** → **Project Settings**
   - **General** tab → Copy **Web API Key**

## That's it! 
Next, I'll modify the PHP code to use Firebase instead of JSON files.
