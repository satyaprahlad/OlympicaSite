# Use the official Python image from the Docker Hub
FROM python:3.10-slim

# Set environment variables
ENV PYTHONDONTWRITEBYTECODE 1
ENV PYTHONUNBUFFERED 1

# Set working directory
WORKDIR /app

# Install dependencies
COPY requirements.txt /app/
RUN pip install --upgrade pip
RUN pip install -r requirements.txt

# Install netcat for checking PostgreSQL readiness
RUN apt-get update && apt-get install -y nmap && apt-get clean

# Copy project files to the working directory
COPY . /app/

# Add the entrypoint.sh script
COPY entrypoint.sh /app/entrypoint.sh

# Make the entrypoint.sh script executable
RUN chmod +x /app/entrypoint.sh

# Run the entrypoint script
ENTRYPOINT ["/app/entrypoint.sh"]
