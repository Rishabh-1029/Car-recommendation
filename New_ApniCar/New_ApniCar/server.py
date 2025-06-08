from flask import Flask, jsonify, request
import subprocess

app = Flask(__name__)

@app.route('/run_python_script', methods=['POST'])
def run_python_script():
    try:
        # Validate request, if necessary
        # data = request.get_json()
        # if not data or 'param' not in data:
        #     return jsonify({'error': 'Missing parameter'}), 400
        
        # Execute the Python script
        script_path = 'car_data_fetch_from_excel.py'
        subprocess.run(['python', script_path], check=True)
        
        return jsonify({'success': True}), 200
    except subprocess.CalledProcessError as e:
        return jsonify({'error': 'Script execution failed'}), 500
    except Exception as e:
        # Log the exception for debugging
        app.logger.error('An error occurred: %s', str(e))
        return jsonify({'error': 'Internal Server Error'}), 500

if __name__ == '__main__':
    app.run(debug=True)
