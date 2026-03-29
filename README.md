# PHP Porto - Vercel Deployment

This is a portfolio website built in plain PHP. It is configured to run on [Vercel](https://vercel.com/) utilizing the community PHP runtime for Serverless Functions.

## Deployment Instructions

Since Vercel natively supports Node.js, Next.js, and static site generation, running PHP requires deploying via the `vercel-php` community runtime configured in `vercel.json`.

### Option 1: Deploying via Vercel Dashboard (GitHub Integration)

This is the easiest way to deploy if you are hosting your repository on GitHub.

1. **Push your code to GitHub**: Commit your clone and push it to a new GitHub repository.
2. **Import Project**: Go to the Vercel Dashboard and click "Add New" -> "Project".
3. **Select Repository**: Select the GitHub repository you just pushed to.
4. **Deploy**: Leave all build commands and output directories as default. Vercel will automatically read the `vercel.json` file and use the `vercel-community/php` runtime.
5. **Visit Site**: Once deployment finishes, your site will be live. Let Vercel build the project; the PHP runtime will serve your pages perfectly!

### Option 2: Deploying via Vercel CLI (Local Deployment)

If you prefer using the command line to deploy directly from your local environment:

1. **Install Vercel CLI**: If you haven't already, install the Vercel tool globally via npm.
   ```bash
   npm i -g vercel
   ```

2. **Login to Vercel**: 
   ```bash
   vercel login
   ```

3. **Deploy**: In the root area of this project folder, run:
   ```bash
   vercel
   ```
   Follow the prompts. Choose the scope and link the local directory to a new project. Leave default build instructions. 

4. **Production Deployment**: Once you're ready to ship changes to production, run:
   ```bash
   vercel --prod
   ```

## Included Configurations

- **`vercel.json`**: This defines the Vercel setup. It directs Vercel to use the `vercel-php` compilation for `.php` files and routes incoming HTTP traffic accurately.

Enjoy your serverless PHP architecture!
